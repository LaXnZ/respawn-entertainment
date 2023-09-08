console.log("main.js loaded");

// Function to handle the initial animation when the page loads
function handleInitialAnimation() {
    const initialElements = document.querySelectorAll(".animate-slide");

    initialElements.forEach((element) => {
        element.style.transform = "translateX(0)";
        element.style.opacity = 1;
    });
}

// Function to handle the scroll animation for bottom divs
function handleScrollAnimation() {
    const bottomElements = document.querySelectorAll(
        ".section:not(.animate-slide)"
    );

    bottomElements.forEach((element) => {
        if (element.getBoundingClientRect().top < window.innerHeight) {
            element.style.opacity = 1;
            element.style.transform = "translateY(0)";
        }
    });
}

// Trigger the initial animation when the page loads
window.addEventListener("load", handleInitialAnimation);

// Attach a scroll event listener to trigger animations for bottom divs when scrolling
window.addEventListener("scroll", handleScrollAnimation);

// Trigger the scroll animation when the page loads (in case some elements are initially in view)
window.addEventListener("load", handleScrollAnimation);
