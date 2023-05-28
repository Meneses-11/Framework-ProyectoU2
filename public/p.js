const api = async()=>{
    const api_key = await fetch('http://127.0.0.1:8000/api/paquete');
    const api_key_json = await api_key.json();
    console.log(api_key_json);
}
