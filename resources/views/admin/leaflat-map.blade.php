<!DOCTYPE html>
<html>
<head>
  <title>Krishna Niswarth Seva Trust</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Leaflet CSS & JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- Leaflet Routing Machine CSS & JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.min.js"></script>

  <style>
    #map { height: 100vh; }
  </style>
</head>
<body>

<div id="map"></div>

<script>
  const map = L.map('map').setView([0, 0], 13);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  // Rickshaw icon
  const rickshawIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/5316/5316727.png',
    iconSize: [50, 50],
    iconAnchor: [25, 50],
    popupAnchor: [0, -45]
  });

  // Stop icon
  const stopIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
    iconSize: [30, 30],
    iconAnchor: [15, 30],
    popupAnchor: [0, -30]
  });

  let userMarker;

  // Define stops as waypoints (in route order)
  const holdPoints = [
    { lat: 23.081, lng: 72.540, label: "Stop 1: Tea Break" },
    { lat: 23.082, lng: 72.542, label: "Stop 2: Fuel Station" },
    { lat: 23.083047041943733, lng: 72.54580072024893, label: "Stop 3: Passenger Pickup" }
  ];

  // Get current location
  navigator.geolocation.getCurrentPosition(position => {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    const userLocation = [lat, lng];

    map.setView(userLocation, 14);

    // Add rickshaw marker
    userMarker = L.marker(userLocation, { icon: rickshawIcon }).addTo(map).bindPopup("You are here").openPopup();

    // Add stop icons on the map
    holdPoints.forEach(point => {
      L.marker([point.lat, point.lng], { icon: stopIcon })
        .addTo(map)
        .bindPopup(point.label);
    });

    // Build route with all stops
    const waypoints = [
      L.latLng(userLocation),
      ...holdPoints.map(stop => L.latLng(stop.lat, stop.lng))
    ];

    L.Routing.control({
      waypoints: waypoints,
      createMarker: () => null, // no default markers
      addWaypoints: false,
      routeWhileDragging: false,
      show: false,
      lineOptions: {
        styles: [{ color: 'green', opacity: 0.8, weight: 5 }]
      }
    }).addTo(map);
  }, error => {
    alert("Location access denied or unavailable.");
  });

  // Watch and update rickshaw position
  navigator.geolocation.watchPosition(position => {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    const newLocation = [lat, lng];

    if (userMarker) {
      userMarker.setLatLng(newLocation);
      map.panTo(newLocation);
    }
  }, error => {
    console.error("Location update error:", error);
  }, {
    enableHighAccuracy: true,
    maximumAge: 0
  });
</script>

</body>
</html>
