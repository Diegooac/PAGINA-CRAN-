import { consume } from "./consume.js"
import { enviaFormRecibeJson } from "./enviaFormRecibeJson.js"

export async function accionElimina(url, formulario, mensajeConfirmacion, nuevaVista) {
  if (!confirm(mensajeConfirmacion)) return

  const nombre = formulario.nombre.value
  const apellidop = formulario.apellidop.value

  await consume(enviaFormRecibeJson(url, formulario))

  alert(`El alumno ${nombre} ${apellidop} eliminado correctamente`)

  location.href = nuevaVista
}