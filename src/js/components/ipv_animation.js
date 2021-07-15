const html = document.documentElement;
const canvas = document.getElementById("ipv-animation");
const title = document.getElementsByClassName("ipv-animation-title")[0];
const context = canvas.getContext("2d");
const ipv_data = JSON.parse(document.getElementById("ipv_data").textContent);
const img_path = ipv_data.img_dir + ipv_data.img_prefix;
const frameCount = ipv_data.last_frame; 
const bg_color = "#e6e6e6";
const text = ipv_data.text;

let images = [null]; // since everything else is 1-indexed, explicitly fill images[0]

Number.prototype.map = function (in_min, in_max, out_min, out_max) {
    return (this - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
  }

function generateText(text, size, index){
    let is_mobile = window.innerWidth < 768 ? true : false;
    let y = 0; 
    let _size = is_mobile ? 32 : title.style.fontSize;  
    let color = 178;

    if(window.innerWidth > 768){
      // Only update the Y, size and color if its desktop
      y = index.map(0, frameCount, 0, -600);
      _size = index.map(0, frameCount, size, 55);
      color = index.map(0, frameCount, 178, 230);
    }
    
    title.style.fontSize = `${_size}px`;
    title.style.transform = `translateY(${y}px)`;
    title.style.color = `rgb(${color},${color}, ${color})`;
    
}

function draw(){
  const currentFrame = index => (
    `${img_path}${index.toString()}.jpg`
  );
  
  // Set canvas dimensions
  canvas.width=window.innerWidth;
  canvas.height=window.innerHeight;


  // Create, load and draw the first image
  const img = new Image()
  img.src = currentFrame(0);
  let scale = window.innerWidth > 768 ? 1 : 0.7;
  let scaled_width, scaled_height, x, y;

  img.onload=function(){
    scaled_width = img.width*scale;
    scaled_height = img.height*scale;
    x = window.innerWidth > 768 ? canvas.width-scaled_width/1.5 : -scaled_width/5;
    y = canvas.height-scaled_height/1.2;
    context.drawImage(img, x, y,scaled_width,scaled_height);
    generateText(text, 77, 0);

  }

  const preloadImages = () => {
    // Preload for faster animation
    for (let i = 0; i <= frameCount; i++) {
      images[i] = new Image();
      images[i].src = currentFrame(i);
    }
  };

  const updateImage = (index) => {
    // Scaled dimensions for mobile
  
    if(window.innerWidth > 768) {
      // We move the image horizontally if desktop
      x = index.map(0, frameCount, canvas.width-scaled_width/1.5, canvas.width/2-scaled_width/2);
    }
    context.fillStyle = bg_color;
    context.fillRect(0, 0, canvas.width, canvas.height);
    context.drawImage(images[index], x, y, scaled_width, scaled_height);
    generateText(text, 77, index);
  } 
  
  window.addEventListener('scroll', () => {  
    const scrollTop = html.scrollTop;
    const maxScrollTop = html.scrollHeight - window.innerHeight;
    const scrollFraction = scrollTop / maxScrollTop;
    const frameIndex = Math.min(
      frameCount - 1,
      Math.ceil(scrollFraction*15 * frameCount)
    );
    
    requestAnimationFrame(() => updateImage(frameIndex + 1, scrollFraction))
  }); 

  preloadImages();
}

draw();

window.onresize = draw;
