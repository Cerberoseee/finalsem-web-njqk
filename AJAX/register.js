export default function register(account){
    fetch('./api/register.php',{
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify(account),
    })
    .then(res => console.log(res));
}