const linksButtons = document.querySelectorAll(".dropbtn");
const questions = document.querySelectorAll(".dropquestion");

questions.forEach((question) => {
  question.addEventListener("click", function () {
    dropQuestion(this);
  });
});

linksButtons.forEach((button) => {
  button.addEventListener("click", function () {
    dropCategory(this);
  });
});

function dropCategory(clickedButton) {
  const buttons = document.querySelectorAll(".dropbtn");
  const categories = document.querySelectorAll(".dropdown");
  const contentId = clickedButton.id.replace("liste", "");
  const content = document.getElementById(`${contentId}affichage`);
  const isCurrentlyOpen = content.classList.contains("dropdown-affichage");

  buttons.forEach((button) => button.classList.remove("dropbtnfocus"));
  categories.forEach((content) => content.classList.remove("dropdown-affichage"));

  if (!isCurrentlyOpen) {
    clickedButton.classList.add("dropbtnfocus");
    content.classList.add("dropdown-affichage");
  }
}

function dropQuestion(clickedQuestion) {
  const allQuestions = document.querySelectorAll(".dropquestion");
  const allAnswers = document.querySelectorAll(".reponse");
  const reponseId = clickedQuestion.id.replace("quest", "");
  const answerToShow = document.getElementById(`reponse${reponseId}`);
  const isCurrentlyOpen = answerToShow.classList.contains("reponse-affichage");

  allQuestions.forEach((question) => question.classList.remove("dropquestionfocus"));
  allAnswers.forEach((reponse) => reponse.classList.remove("reponse-affichage"));

  if (!isCurrentlyOpen) {
    clickedQuestion.classList.add("dropquestionfocus");
    answerToShow.classList.add("reponse-affichage");
  }
}
