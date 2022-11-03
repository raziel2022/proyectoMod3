const OPTIONS = {
    method: 'GET',
    headers: {
		'X-RapidAPI-Key': '50aa8dd555msh7d85d88a1964cd9p198e6ejsn70d3e7a57b3f',
		'X-RapidAPI-Host': 'ip-geolocation-ipwhois-io.p.rapidapi.com'
	}
}
export function fetchIpInfo(ip) {
  return fetch(`https://ip-geolocation-ipwhois-io.p.rapidapi.com/json/${ip}`, OPTIONS)
    .then(res => res.json())
    .catch(err => console.error(err));
}