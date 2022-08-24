form = document.getElementById('form-frete');

function sendShipping(event) {
    event.preventDefault();
    const city = this.city.value;
    const state = this.state.value;
    const URL = 'http://127.0.0.1:8090/calculate_shipping';

   todo = {"city":city,"state":state}

    axios.post(URL,todo,{
        headers:{
            'x-access-token':'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZXhwIjoxNjYxMjIzNzg0fQ.xMI8Qya9to106HhqknoYroNJMEdHvbsXc3-Fa4454JQ'
        }
    }).then(function (resposta) {
        console.log(resposta.data);
        const div = document.getElementById('send');
        exibir(resposta.data, div);
    });

}

function exibir(data, element) {
    element.innerHTML = data.value

    
}
form.addEventListener('submit', sendShipping);