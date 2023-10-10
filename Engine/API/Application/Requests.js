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
                data: jq_block.find('[name=data]').val(),
                program: jq_block.find('[name=program]').val(),
                status: jq_block.find('[name=status]').val(),
                title: jq_block.find('[name=title]').val(),
                type: jq_block.find('[name=type]').val()
            }, function (data) {
                Interstate60.Application.Diary.show();
            }, function () {

            });
        }
    },

    Plans: {
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

            API.request('Interstate60.Application.Plans.Create', {

            }, function (data) {
                Interstate60.Application.Plans.getCollection();
            }, function () {

            });
        },

        show: function (key_phan)
        {
            API.request('Interstate60.Application.Plans.Show', {
                key_plan: key_phan
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_phan)
        {
            API.request('Interstate60.Application.Plans.Edit', {
                key_plan: key_phan
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_phan)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Interstate60.Application.Plans.Save', {
                key_plan: key_phan,
                title: jq_block.find('[name=title]').val(),
                program: jq_block.find('[name=program]').val(),
                status: jq_block.find('[name=status]').val()
            }, function (data) {
                Interstate60.Application.Plans.getCollection();
            }, function () {

            });
        },

        getCollection: function ()
        {
            API.request('Interstate60.Application.Plans.Collection', {

            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },
    }
}