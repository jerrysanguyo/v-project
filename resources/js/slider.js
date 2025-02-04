"use strict";

document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("slider");
    if (!slider) {
        console.error("Slider element not found!");
        return;
    }
    
    slider.style.left = "0px";

    const sliderContainer = slider.parentElement;
    let isDragging = false;

    function getClientX(e) {
        return e.touches ? e.touches[0].clientX : e.clientX;
    }

    function onStart(event) {
        isDragging = true;
        const maxRight = sliderContainer.offsetWidth - slider.offsetWidth;

        document.addEventListener("mousemove", onMove);
        document.addEventListener("mouseup", onEnd);
        document.addEventListener("touchmove", onMove);
        document.addEventListener("touchend", onEnd);

        function onMove(e) {
            if (!isDragging) return;
            let moveX =
                getClientX(e) - sliderContainer.getBoundingClientRect().left;
                
            if (moveX < 0) moveX = 0;
            if (moveX > maxRight) moveX = maxRight;
            slider.style.left = moveX + "px";
            
            if (moveX >= maxRight) {
                isDragging = false;
                removeListeners();
                setTimeout(() => {
                    window.location.href = "/passcode";
                }, 300);
            }
        }

        function onEnd() {
            isDragging = false;
            if (parseInt(slider.style.left, 10) < maxRight) {
                slider.style.left = "0px";
            }
            removeListeners();
        }

        function removeListeners() {
            document.removeEventListener("mousemove", onMove);
            document.removeEventListener("mouseup", onEnd);
            document.removeEventListener("touchmove", onMove);
            document.removeEventListener("touchend", onEnd);
        }
    }
    
    slider.addEventListener("mousedown", onStart);
    slider.addEventListener("touchstart", onStart);
});
