require('./bootstrap');

$(document).ready(function () {
    $('#add-new-ingrdient-recept').click(function (e) {
        e.preventDefault();
        var $addIngridientReceptTemlate = $(".new-ingridient-recept-template").first().clone();
        $addIngridientReceptTemlate.find('.count-ingridient').val('');
        $addIngridientReceptTemlate.find('.select-ingridients').val('');
        $('#all-recept-ingridients-from').append($addIngridientReceptTemlate);
    });

    $('body').on('click', '.remove-ingridient-recept', function (e) {
        e.preventDefault();
        if ($('.new-ingridient-recept-template').length <= 1) {
            alert('Нельзя удалить единственный ингридиент со списка');
        } else {
            $(this).closest('.new-ingridient-recept-template').remove();
        }
    });
});
