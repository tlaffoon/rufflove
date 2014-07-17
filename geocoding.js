// https://developers.google.com/maps/articles/geocodestrat

// Here is a sample of client-side geocoding which takes an address, geocodes it, 
// moves the center of the map to that location and adds a map marker there.

geocoder = new google.maps.Geocoder();
geocoder.geocode({ 'address': address }, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
    var marker = new google.maps.Marker({
    map: map,
    position: results[0].geometry.location
  });


// Here is an example of using Python to do a server-side geocoding request.

import urllib2

address="1600+Amphitheatre+Parkway,+Mountain+View,+CA"
url="http://maps.googleapis.com/maps/api/geocode/json?address=%s" % address

response = urllib2.urlopen(url)
jsongeocode = response.read()


// This produces a JSON object with the following content:

{
  "status": "OK",
  "results": [ {
    "types": street_address,
    "formatted_address": "1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA",
    "address_components": [ {
      "long_name": "1600",
      "short_name": "1600",
      "types": street_number
    }, {
      "long_name": "Amphitheatre Pkwy",
      "short_name": "Amphitheatre Pkwy",
      "types": route
    }, {
      "long_name": "Mountain View",
      "short_name": "Mountain View",
      "types": [ "locality", "political" ]
    }, {
      "long_name": "San Jose",
      "short_name": "San Jose",
      "types": [ "administrative_area_level_3", "political" ]
    }, {
      "long_name": "Santa Clara",
      "short_name": "Santa Clara",
      "types": [ "administrative_area_level_2", "political" ]
    }, {
      "long_name": "California",
      "short_name": "CA",
      "types": [ "administrative_area_level_1", "political" ]
    }, {
      "long_name": "United States",
      "short_name": "US",
      "types": [ "country", "political" ]
    }, {
      "long_name": "94043",
      "short_name": "94043",
      "types": postal_code
    } ],
    "geometry": {
      "location": {
        "lat": 37.4220323,
        "lng": -122.0845109
      },
      "location_type": "ROOFTOP",
      "viewport": {
        "southwest": {
          "lat": 37.4188847,
          "lng": -122.0876585
        },
        "northeast": {
          "lat": 37.4251799,
          "lng": -122.0813633
        }
      }
    }
  } ]
}



// When to Use Client-Side Geocoding

// The basic answer is "almost always." As geocoding limits are per user session, there is no risk that your application will reach a global limit as your userbase grows. Client-side geocoding will not face a quota limit unless you perform a batch of geocoding requests within a user session. Therefore, running client-side geocoding, you generally don't have to worry about your quota.

// Two basic architectures for client-side geocoding exist.

// Run the geocoding and display entirely in the browser. For instance, the user enters an address on your page. Your application geocodes it. Then your page uses the geocode to create a marker on the map. Or your app does some simple analysis using the geocode. No data is sent to your server. This reduces load on your server, but doesn't give you any sense of what your users are doing.

// Run the geocode in the browser and then send it to the server. For instance, the user enters an address. Your application geocodes it in the browser. The app then sends the data to your server. The server responds with some data, such as nearby points of interest. This allows you to customize a response based on your own data, and also to cache the geocode if you want. This cache allows you to optimize even more. You can even query the server with the address, see if you have a recently cached geocode for it, and if you do, use that. If you don't, then return no result to the browser, and let it geocode the result and send it back to the server to for caching.

// When to Use Server-Side Geocoding

// Server-Side Geocoding is best used for applications that require you to geocode addresses without input from a client. This usually happens when you get a dataset that comes separately from user input, for instance if you have a fixed, finite, and known set of addresses that need geocodes. Server-side geocoding can also be useful as a back-up for when client-side geocoding fails.

// You should be wary of relying on server-side geocoding. The 2,500 request limit is per IP address. All people using your application are sharing your single server. If you are processing requests that come in from a large number of clients, you could easily overload your quota for the day, or even the queries per second from the same IP address. Also, many cloud computing infrastructures, such as Google App Engine or Amazon Web Services, share IP addresses between different applications. Your requests may run up against quota used by other applications wholly outside your control.

// The basic architecture for a server-side geocoding application is the following:

// A server based application sends an address to the server's geocoding script.
// The script checks the cache to see if the address has recently been geocoded.
// If it has, the script returns that geocode to the original application.
// If it has not, the script sends a geocoding request to Google. Once it has a result, it caches it, and then returns the geocode to the original application.
// Sometime later, the geocode is used to display data on a Google Map.


// ----------------------------------

// https://developers.google.com/maps/documentation/javascript/geocoding#Geocoding

// Overview

// Geocoding is the process of converting addresses (like "1600 Amphitheatre Parkway, Mountain View, CA") into geographic coordinates (like latitude 37.423021 and longitude -122.083739), which you can use to place markers or position the map.

// Reverse geocoding is the process of converting geographic coordinates into a human-readable address.

// The Google Maps API provides a geocoder class for geocoding and reverse geocoding dynamically from user input. When you first load the API, you will be allocated an initial quota of Geocoding requests. Once you have used this quota, additional requests will be rate-limited on a per-second basis. If instead you wish to geocode static, known addresses, see the Geocoding web service documentation.

// Geocoding Requests

// Accessing the Geocoding service is asynchronous, since the Google Maps API needs to make a call to an external server. For that reason, you need to pass a callback method to execute upon completion of the request. This callback method processes the result(s). Note that the geocoder may return more than one result.

// You access the Google Maps API geocoding service within your code via the google.maps.Geocoder object. The Geocoder.geocode() method initiates a request to the geocoding service, passing it a GeocodeRequest object literal containing the input terms and a callback method to execute upon receipt of the response.

// The GeocodeRequest object literal contains the following fields:

{
 address: string,
 location: LatLng,
 bounds: LatLngBounds,
 region: string
}

These fields are explained below.

// address (required*) — The address which you want to geocode.
// latLng (required*) — The LatLng for which you wish to obtain the closest, human-readable address.
// bounds (optional) — The LatLngBounds within which to bias geocode results more prominently. (For more information see Viewport Biasing below.)
// region (optional) — The region code, specified as a IANA language region subtag. In most cases, these tags map directly to familiar ccTLD ("top-level domain") two-character values. (For more information see Region Code Biasing below.)
// componentRestrictions (optional) — Used to restrict results to a specific area. A filter consists of one or more of: route, locality, administrativeArea, postalCode or country. Only the results that match all the filters will be returned. Filter values support the same methods of spelling correction and partial matching as other geocoding requests. See Component Filtering in the Geocoding web service for further details.

// * Note: You may pass either an address or a latLng to lookup. (If you pass a latLng, the geocoder performs what is known as a reverse geocode. See Reverse Geocoding for more information.)  The bounds and region parameters will only influence, not fully restrict, results from the geocoder.


