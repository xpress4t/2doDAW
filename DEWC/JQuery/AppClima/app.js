const apiKey = "78d82772dd172993db244721a6d84c7b";
const cities = ["Lima","London","Madrid","Barcelona","Paris","Berlin","Alaska"];
const weatherDiv = document.getElementById("weather")
    
cities.forEach(city => {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&lang=es&appid=${apiKey}`;
    fetch(url)
    .then(response => {
        return response.json();
    })
    .then(data => {
    const cityWeather = document.createElement("div");
    cityWeather.innerHTML = `<div class="city">
        <h2>Clima en ${data.name}</h2>
        <p style="color:blue">${data.weather[0].description}</p>
        <p>ID: ${data.id}</p>
        <p>Temperatura: ${data.main.temp}°C</p>
        <p>Humedad: ${data.main.humidity}%</p>
        <p>Latitutd: ${data.coord.lat}</p>
        <p>Longitud: ${data.coord.lon}</p>
        <p>Velocidad del viento: ${data.wind.speed}m/s</p>
        <p>Ciudad: ${data.sys.country}</p>
        </div>
          `;
        weatherDiv.appendChild(cityWeather);
    })
})

/*
{
  "coord": {
    "lon": -0.1257,
    "lat": 51.5085
  },
  "weather": [
    {
      "id": 802,
      "main": "Clouds",
      "description": "scattered clouds",
      "icon": "03d"
    }
  ],
  "base": "stations",
  "main": {
    "temp": 280.04,
    "feels_like": 277.55,
    "temp_min": 279.01,
    "temp_max": 281.07,
    "pressure": 1035,
    "humidity": 87,
    "sea_level": 1035,
    "grnd_level": 1031
  },
  "visibility": 10000,
  "wind": {
    "speed": 3.6,
    "deg": 240
  },
  "clouds": {
    "all": 40
  },
  "dt": 1736854164,
  "sys": {
    "type": 2,
    "id": 2075535,
    "country": "GB",
    "sunrise": 1736841606,
    "sunset": 1736871518
  },
  "timezone": 0,
  "id": 2643743,
  "name": "London",
  "cod": 200
}
*/