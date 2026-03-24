export function enviaJsonRecibeJson(url, datos) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json"
    },
    body: JSON.stringify(datos)
  })
}