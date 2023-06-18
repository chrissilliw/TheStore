const sellBtn = document.querySelectorAll('.sell-btn');


sellBtn.forEach( (sellButton) => {
    sellButton.addEventListener('click', function(){
        console.log("funka");
    })
});
