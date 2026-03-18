function enviaFormRecibeJson(url, form, callback){
    fetch(url, {
        method: "POST",
        body: new FormData(form)
    })
    .then(res => res.json())
    .then(data => callback(data))
    .catch(err => console.error(err));
}