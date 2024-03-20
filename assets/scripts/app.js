/**
 * Passons maintenant à l'implémentation du JavaScript.
 *
 * Ce fichier contient du code JavaScript qui doit être exécuté sur toutes les pages.
 * Par exemple, le code qui gère le formulaire de newsletter.
 */

/**
 * EVENT LISTENER
 *
 * Un "event listener" est une fonction qui écoute un événement sur un élément HTML.
 *
 * Ici, on écoute l'événement "DOMContentLoaded" sur le document pour vérifier que le DOM est bien chargé (c'est-à-dire que la page est bien prête)
 * et on exécute une fonction qui contient notre code JavaScript (c'est une bonne pratique pour éviter les problèmes de chargement).
 *
 * Note: on utilise une fonction fléchée (ES6) pour définir la fonction de rappel
 */
document.addEventListener("DOMContentLoaded", () => {
  /* On affiche un message dans la console pour vérifier que le fichier est bien chargé (pas obligatoire, mais pratique débugger) */
  console.log("app.js chargé 🚀");

  /* On initialise la fonction newsletterSubscribe */
  newsletterSubscribe();

  /* On initialise aussi la fonction toggleThemeMode() */
  toggleThemeMode();
});

/**
 * Fonction qui gère le formulaire de newsletter
 *
 * Cette fonction est appelée dans l'event listener ci-dessus.
 * Elle nous sert à vérifier que l'email est valide et active le bouton d'envoi si c'est le cas.
 */
function newsletterSubscribe() {
  /* On commence par cibler le formulaire de newsletter grace à son id en utilisant querySelector() et on le stock dans une constante "newsletterForm" */
  const newsletterForm = document.querySelector("#newsletter-form");

  /* On récupère maintenant l'input de l'email et on le stock dans une constante "emailInput" */
  const emailInput = newsletterForm.querySelector("input[type=email]");

  /* On récupère aussi le bouton d'envoi et on le stock dans une constante "submitButton" */
  const submitButton = newsletterForm.querySelector("button[type=submit]");

  /**
   * STOP ! Attendez une minute !
   * Si le formulaire OU <input type=email > OU <button type="submit"> n'existent pas, nous aurons des erreurs.
   * En effet, les prochaines instructions sont construites sur l'hypothèse que ces éléments existent.
   * Pour éviter cela, nous devons vérifier si le formulaire et les champs dont nous avons besoin existent bien avant de continuer.
   *
   * Nous utilisons donc une condition IF pour vérifier si newsletterForm, emailInput et submitButton existent bien.
   * Si l'un d'eux n'existe pas, nous sortons de la fonction en utilisant le mot-clé RETURN.
   */
  if (!newsletterForm || !emailInput || !submitButton) {
    return;
  }

  /* Super 👍, maintenant continuons... */

  /* On commence par désactiver le bouton d'envoi par défaut pour éviter l'envoi avant vérification du champ */
  submitButton.disabled = true;

  /*
   * Cette fonction valide le champ email du formulaire de newsletter.
   * Elle utilise la fonction validateEmail() pour vérifier si l'email est valide.
   */
  function validateNewsletterEmailField() {
    /* SI l'email est valide en utilisant la fonction validateEmail() */
    if (validateEmail(emailInput.value)) {
      /*
       * donc SI validateEmail() renvoie 'true' (l'email est valide),
       * on active le bouton d'envoi en définissant sa propriété 'disabled' à 'false'.
       */
      submitButton.disabled = false;
    } else {
      /*
       * SINON, si l'email n'est pas valide,
       * on désactive le bouton d'envoi en définissant sa propriété 'disabled' à 'true'.
       */
      submitButton.disabled = true;
    }
  }

  /*
   * Cette fonction valide une adresse email.
   * Elle utilise une expression régulière pour vérifier si l'email est dans un format valide.
   * Elle renvoie 'true' si l'email est valide et 'false' sinon.
   */
  function validateEmail(email) {
    /* Définit l'expression régulière pour un format d'email valide */
    const regExp = /\S+@\S+\.\S+/;

    /* Teste si l'email correspond à l'expression régulière */
    /* Renvoie 'true' si l'email est valide, 'false' sinon */
    return regExp.test(email);
  }

  /* On pourrait imaginer d'autres fonctions de validation de champ comme un âge minimum par exemple ... */

  /**
   * Enfin, On écoute l'événement "input", c'est à dire quand l'utilisateur tape du text, sur l'input de l'email
   * et on appelle la fonction validate à chaque fois que l'événement est déclenché pour vérifier si l'email est valide
   */
  emailInput.addEventListener("input", validateNewsletterEmailField);
}

/**
 * Fonction qui gère le mode sombre/clair
 */
function toggleThemeMode() {
  /**
   * TP: À VOUS DE JOUER !
   * ----------------------------------------------
   * Vous devez écrire le code qui permet de changer de thème en cliquant sur le bouton
   * Suivez les étapes ci-dessous pour implémenter cette fonctionnalité :
   */
  // 1. Ciblez le bouton qui permet de changer de thème
  // 2. Ciblez le html pour changer l'attribut [data-theme]
  // 3. Vérifies si le bouton existe sinon on sort de la fonction
  // 4. Écoutez l'événement "click" sur le bouton
  // 5. Créez une fonction qui permet de changer le thème
  // 6. Dans la fonction, vérifiez si le thème actuel est "dark"
  // 7. SI c'est le cas, changez le thème en "light" en utilisant la méthode setAttribute()
  // 8. SINON, changez le thème en "dark"
  // 9. Testez votre code en cliquant sur le bouton pour changer de thème
  //
  // Bravo ! 👏
  //
  // BONUS:
  // Stockez le thème actuel dans le localStorage pour le conserver après le rechargement de la page
  // 10. Récupérez le thème stocké dans le localStorage
  // 11. Mettez à jour le thème actuel en utilisant la méthode setAttribute()
  // 12. Stockez le thème actuel dans le localStorage à chaque fois que le thème change
  // 13. Testez votre code en rechargeant la page pour vérifier que le thème est conservé
  //
  // Félicitation ! Vous déchirez !!! 🚀
}
