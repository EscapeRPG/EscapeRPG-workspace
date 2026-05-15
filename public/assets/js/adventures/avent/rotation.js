const container = document.getElementById("machineenigme");

for (let index = 1; index <= 18; index++) {
  container.innerHTML += `
	<div class="spin0">
		<img src="/assets/img/avent/machineenigme/piece${index}.png" alt="une pièce de machine">
	</div>`;
}

const tiles = document.querySelectorAll(".spin0");

tiles.forEach((tile) => {
  tile.addEventListener("click", () => {
    rotateTile(tile);
  });
});

function rotateTile(image) {
  const currentAngle = Number.parseInt(image.dataset.angle || "0", 10);
  const nextAngle = currentAngle + 90;

  image.dataset.angle = String(nextAngle);
  image.style.transform = `rotate(${nextAngle}deg)`;
}
