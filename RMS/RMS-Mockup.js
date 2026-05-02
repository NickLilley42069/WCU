const menuBtn = document.getElementById("menuBtn");
const closeBtn = document.getElementById("closeBtn");
const sideBarNav = document.getElementById("sideBarNav");

menuBtn.addEventListener("click", () => {
  sideBarNav.style.left = "0";    // Slide sidebar in
  menuBtn.style.display = "none"; // Hide Menu button
});

closeBtn.addEventListener("click", () => {
  sideBarNav.style.left = "-220px"; // Slide sidebar out
  menuBtn.style.display = "block"; // Show Menu button
});
