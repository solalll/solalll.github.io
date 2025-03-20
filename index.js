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

  joueurs.map(({ nom, age, poste }) => {
    const div = `<div class="joueur"><p>Nom: ${nom}</p><p>Poste: ${poste}</p>\n<p>Age: ${age}</p></div>`;

    joueursDiv.innerHTML += div;
  });