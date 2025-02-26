async function loadMatch() {
    const response = await fetch('http://127.0.0.1/server/game.php');
    const data = await response.json();
    document.getElementById('status').innerText = JSON.stringify(data);
    
}


async function saveMatch() {
    event.preventDefault();

    const number = document.getElementById('numberInput').value;

    await fetch ("http://127.0.0.1/server/game.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({number: number}),
    });

    alert("Match saved");
}