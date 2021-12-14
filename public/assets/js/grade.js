$('#id-class').change(function (e) {
    $('#id-student').html('');
    $('#idSub').html('');
    $('#student-list').html('');
    var idClass = $(this).val();
    var CurrentURL = window.location.href;
    var URL = CurrentURL + "/get-students/" + idClass;
    var URL2 = CurrentURL + "/get-subject/" + idClass;

    $.ajax({
        type: "get",
        url: URL,
        success: function (response) {
            $.each(response, function (index, value) {
                console.log(value);
                var option = `
                <option value="${value.idStudent}">${value.name}</option>
                `;
                $('#id-student').append(option);
            });
        }
    });
    $.ajax({
        type: "get",
        url: URL2,
        success: function (response) {
            $.each(response, function (index, value) {
                console.log(value);
                var option = `
                <option value="${value.idSub}">${value.nameSub}</option>
                `;
                $('#idSub').append(option);
            });
        }
    });
})