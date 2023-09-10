Interstate60.Application = {
    Diary: {
        show: function (key_day)
        {
            if(typeof(key_day) === 'undefined')
            {
                key_day = $('#application-diary-show [name=key_day]').val();
            }

            API.request('Interstate60.Application.Diary.Show', {
                key_day: key_day
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_day)
        {
            if(typeof(key_day) === 'undefined')
            {
                key_day = $('#application-diary-show [name=key_day]').val();
            }

            API.request('Interstate60.Application.Diary.Edit', {
                key_day: key_day
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_day)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Interstate60.Application.Diary.Save', {
                key_day: key_day,
                title: jq_block.find('[name=title]').val(),
                program: jq_block.find('[name=program]').val(),
                data: jq_block.find('[name=data]').val(),
            }, function (data) {
                Interstate60.Application.Diary.show(key_day);
            }, function () {

            });
        }
    }
}