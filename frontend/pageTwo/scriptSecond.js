const form = document.getElementById("feedbackForm");
const responseEl = document.getElementById("response");

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData(form);

  const res = await fetch("submit.php", {
    method: "POST",
    body: formData,
  });

  const text = await res.text();
  responseEl.textContent = text;
  form.reset();
  document.getElementById("imagePreview").classList.add("hidden");
});

function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function () {
    const img = document.getElementById("imagePreview");
    img.src = reader.result;
    img.classList.remove("hidden");
  };
  reader.readAsDataURL(event.target.files[0]);
}

function previewImage(event) {
  const preview = document.getElementById("imagePreview");
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = function (e) {
    preview.src = e.target.result;
    preview.classList.remove("hidden");
  };
  reader.readAsDataURL(file);
}
