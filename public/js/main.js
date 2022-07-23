var url = location.origin;
window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    //Boton de like
    function like() {
        $('.btn-like').unbind('click').click(function () {

            console.log('.btn-like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src','img/like-clic.png');

            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    
                    console.log(response);
                }
            });


            dislike();

        });
    }
    like();
    function dislike() {
        $('.btn-dislike').unbind('click').click(function () {

            console.log('.btn-dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src','img/like.png');


            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    console.log(response);
                }
            });


            like();

        });

    }
    dislike();
});