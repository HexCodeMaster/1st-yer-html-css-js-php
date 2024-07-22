
document.addEventListener('DOMContentLoaded', function() {
    const mainItems = document.querySelectorAll('.main-item');
  
    mainItems.forEach(item => {
      item.addEventListener('click', function() {
        const subMenu = this.querySelector('.sub-menu');
        if (subMenu) {
          subMenu.classList.toggle('show');
        }
      });
    });
  });
  let left = document.getElementById("left");
  let mainBox = document.getElementById('mainBox');
  
  function transLeft() {
    left.style.transition = "transform 1s";
    left.style.transform = "translateX(350px)";
  }
  
  function transRight() {
    left.style.transition = "transform 2s";
    left.style.transform = "translateX(50px)";
  }
  
  
  
  
  
  function handleClick() {
    if (left.style.transform !== "translateX(350px)") {
      transLeft();
    } else {
      transRight();
    }
  }
  
  
  
  function moveBox(event) {
    mainBox.style.position = 'absolute';
    let x = event.clientX;
    let y = event.clientY;
    mainBox.style.left = x + 'px';
    mainBox.style.top = y + 'px';
  }
  
  mainBox.addEventListener('mousedown', function(event) {
    if (event.button === 0 && (event.metaKey || event.ctrlKey)) {
      document.addEventListener('mousemove', moveBox);
      document.addEventListener('mouseup', function() {
        document.removeEventListener('mousemove', moveBox);
      });
    }
  });
  navBox.addEventListener('mousedown', function(event) {
    if (event.button === 0 && (event.metaKey || event.ctrlKey)) {
      document.addEventListener('mousemove', moveBox);
      document.addEventListener('mouseup', function() {
        document.removeEventListener('mousemove', moveBox);
      });
    }
  });
  function showTooltip(tooltipId) {
    var tooltip = document.getElementById(tooltipId);

   
    if (tooltip.style.display === 'block') {
        tooltip.style.display = 'none';
    } else {
        tooltip.style.display = 'block';
    }}
    function toggleWebsite(element) {
      let websiteInfo = element.querySelector('.website-info');
      let copiedInfo = element.querySelector('.copied-info');
      
    
      websiteInfo.style.display = websiteInfo.style.display || 'none';
      copiedInfo.style.opacity = copiedInfo.style.opacity || '0';
  
      
      if (websiteInfo.style.display === 'none') {
       
          
          copyTextToClipboard(websiteInfo.innerText);
          websiteInfo.style.display = 'none';
          copiedInfo.style.opacity = '1';
          
        
          setTimeout(() => {
              copiedInfo.style.opacity = '0';
          }, 3000);
      }
  }
  
  function copyTextToClipboard(text) {
      const dummy = document.createElement('textarea');
      document.body.appendChild(dummy);
      dummy.value = text;
      dummy.select();
      document.execCommand('copy');
      document.body.removeChild(dummy);
  }
  