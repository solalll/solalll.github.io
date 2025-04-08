const joueurs = [
  {
    nom: "Solal",
    age: "18",
    poste: "5",
  },
  {
    nom: "Remi",
    age: "17",
    poste: "2",
  },
  {
    nom: "Titouan",
    age: "17",
    poste: "3",
  },
  {
    nom: "Martin",
    age: "19",
    poste: "1",
  },
  {
    nom: "Nouss",
    age: "16",
    poste: "1",
  },
];

const joueursDiv = document.querySelector(".joueurs");

joueurs.forEach(({ nom, age, poste }) => {
  const div = `
    <div class="joueur">
      <p><strong>Nom:</strong> <span>${nom}</span></p>
      <p><strong>Poste:</strong> <span>${poste}</span></p>
      <p><strong>Age:</strong> <span>${age}</span></p>
    </div>
  `;

  joueursDiv.innerHTML += div;
});
