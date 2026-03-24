import { consume } from "./consume.js"
import { enviaFormRecibeJson } from "./enviaFormRecibeJson.js"

export async function submitAccion(event, url, formulario, nuevaVista, mensajeAccion = "") {
  event.preventDefault()

  // 👇 obtenemos datos del formulario
  const nombre = formulario.nombre.value
  const apellidop = formulario.apellidop.value

  await consume(enviaFormRecibeJson(url, formulario))

  // 👇 mensaje dinámico
  alert(`El alumno ${nombre} ${apellidop} ${mensajeAccion}`)

  location.href = nuevaVista
}