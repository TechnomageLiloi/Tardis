Interstate60.Application = {
    Diary: {
        create: function ()
        {
            if(!confirm('Are you sure you want to jump?'))
            {
                return;
            }

            if(!confirm('This day is complete?'))
            {
                return;
            }

            API.request('Interstate60.Application.Diary.Create', {

            }, function (data) {
                Interstate60.Application.Diary.show();
            }, function () {

            });
        },

        show: function ()
        {
            API.request('Interstate60.Application.Diary.Show', {

            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function ()
        {
            API.request('Interstate60.Application.Diary.Edit', {

            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function ()
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Interstate60.Application.Diary.Save', {
                title: jq_block.find('[name=title]').val(),
                program: jq_block.find('[name=program]').val(),
                data: jq_block.find('[name=data]').val(),
                status: jq_block.find('[name=status]').val()
            }, function (data) {
                Interstate60.Application.Diary.show();
            }, function () {

            });
        }
    }
}