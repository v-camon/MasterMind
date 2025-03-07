async function loadMatch() {
    const response = await fetch('/api/game.php');
    const data = await response.json();
    document.getElementById('number').innerText = JSON.stringify(data);
    
}


setInterval(loadMatch, 2000);

async function saveMatch() {
    event.preventDefault();

    const number = document.getElementById('numberInput').value;

    await fetch ("/api/game.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({number: number}),
    });
    
}