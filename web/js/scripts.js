$(() => {
    $(".myButton").click(() => {
        $(".content").slideToggle();
    });
});


// var flag = 1;
// var abc = '<?php echo $values; ?>';

// function scrollAction() {
//     if (flag == 1 && abc != 0) {
//         window.scrollTo(0, 1000);
//         flag = 2;
//     } else {
//         if (flag == 2 && abc != 0) {
//             window.scrollTo(0, -1000);
//             flag = 1;
//         }
//     }
// }
