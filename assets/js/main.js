    $("#edit").click(function () {
            const element = document.querySelector('.container');
            element.classList.add('animated','bounceInLeft');
            element.html("^ª^");
            setTimeout(function() {
                element.classList.remove('animated','bounceInLeft');
            }, 1000);
    });

