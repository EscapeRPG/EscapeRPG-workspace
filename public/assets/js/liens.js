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
  const contentId = clickedButton.dataset.categoryTarget;
  const content = document.querySelector(`[data-category-panel="${contentId}"]`);
  if (!content) {
    return;
  }

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
  const allAnswers = document.querySelectorAll(".dropanswer");
  const answerId = clickedQuestion.dataset.answerTarget;
  const answerToShow = document.querySelector(`[data-answer-panel="${answerId}"]`);
  if (!answerToShow) {
    return;
  }

  const isCurrentlyOpen = answerToShow.classList.contains("dropanswer-affichage");

  allQuestions.forEach((question) => question.classList.remove("dropquestionfocus"));
  allAnswers.forEach((reponse) => {
    reponse.classList.remove("dropanswer-affichage");
    reponse.style.maxHeight = null;
  });

  if (!isCurrentlyOpen) {
    clickedQuestion.classList.add("dropquestionfocus");
    answerToShow.classList.add("dropanswer-affichage");
    answerToShow.style.maxHeight = `${answerToShow.scrollHeight}px`;
  }
}
