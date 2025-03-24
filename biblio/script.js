const searchBar = document.getElementById("search");
const taskList=document.getElementById("livre");
searchBar.addEventListener("input", (event) => { 
    const filter = event.target.value.toLowerCase(); 
    const tasks = taskList.getElementsByTagName("p"); 
    const livres= document.getElementsByTagName("div");
    const allDivs = taskList.getElementsByTagName("div");
    Array.from(allDivs).forEach((div) => {
        div.style.display = "none"; // Cache tous les <div>
    });
    Array.from(tasks).forEach((task) => { 
        const text = task.firstChild.textContent.toLowerCase(); 
        const parentDiv=task.closest("div");
        if (parentDiv && text.includes(filter)) { 
            parentDiv.style.display = ""; // Affiche le <div> contenant le <p> correspondant
        }
    });
       
}); 
    