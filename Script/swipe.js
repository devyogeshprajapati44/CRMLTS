// Swipe detection script
let xDown = null;

function handleTouchStart(evt) {
  xDown = evt.touches[0].clientX; // Record initial touch point
}

function handleTouchMove(evt) {
  if (!xDown) return;

  const xUp = evt.touches[0].clientX;
  const xDiff = xDown - xUp;

  if (Math.abs(xDiff) > 50) {
    // Swipe threshold
    if (xDiff > 0) {
      // Swipe Left
      console.log("Swipe Left");
      document.getElementById("swipeBox").textContent = "Swiped Left";
    } else {
      // Swipe Right
      console.log("Swipe Right");
      document.getElementById("swipeBox").textContent = "Swiped Right";
    }
    xDown = null; // Reset touch position
  }
}

document.getElementById("swipeBox").addEventListener("touchstart", handleTouchStart, false);
document.getElementById("swipeBox").addEventListener("touchmove", handleTouchMove, false);

console.log("swipe.js loaded successfully!");

// This is not create the function sendSwipeAction: 


// function sendSwipeAction(direction) {
//     fetch('swipe_handler.php', {
//       method: 'POST',
//       headers: { 'Content-Type': 'application/json' },
//       body: JSON.stringify({ action: direction }),
//     })
//       .then(response => response.json())
//       .then(data => console.log(data.message))
//       .catch(error => console.error('Error:', error));
//   }
  
  function handleTouchMove(evt) {
    if (!xDown) return;
  
    const xUp = evt.touches[0].clientX;
    const xDiff = xDown - xUp;
  
    if (Math.abs(xDiff) > 50) {
      const direction = xDiff > 0 ? "Swipe Left" : "Swipe Right";
      console.log(direction);
      
      document.getElementById("swipeBox").textContent = direction;
  
      // Send action to PHP
      sendSwipeAction(direction);
  
      xDown = null; // Reset touch position
    }
    
  }
  
