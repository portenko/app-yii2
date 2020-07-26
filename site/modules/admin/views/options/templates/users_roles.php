<?php

use \site\assets\Select2Asset;

Select2Asset::register($this);

$roles = !empty($model->value) ? explode(',', $model->value) : ['admin']; // there is always an admin by default !
sort($roles);
?>

<div class="row">
    <div class="col-sm-12">
        <h5>Roles</h5>
        <div class="roles">
            <?php foreach($roles as $role){ ?>
                <span class="btn btn-secondary btn-sm role" data-role="<?= $role ?>"><?= $role ?> <i class="fas fa-times-circle"></i></span>
            <?php } ?>
        </div>
    </div>
    <div class="col-sm-3 mt-2">
        <div class="input-group mb-3">
          <input type="text" class="form-control input-new-role" placeholder="Type new role here...">
          <div class="input-group-append">
            <button class="btn btn-primary btn-sm add-role" type="button">Add role</button>
          </div>
        </div>
    </div>

</div>
    <?= $form->field($model, 'value', ['options' => ['hidden' => true]])->hiddenInput(['value' => implode(',', $roles)]) ?>
<?php

$js = <<<JS
    var roles = [];
    $('.roles .role').each(function(){
        roles.push($(this).data('role'));
    });
    $('.add-role')
    .on('click', function()
    {
        var blankRoleTag = ' <span class="btn btn-secondary btn-sm role" data-role="{role-name}">{role-name} <i class="fas fa-times-circle"></i></span>',
            inputRole = $('.input-new-role'),
            inputRoleVal = inputRole.val().trim(),
            roleTag = blankRoleTag.replace(/{role-name}/g, inputRoleVal);
        if(inputRoleVal !== '')
        {
            if(roles.indexOf(inputRoleVal) < 0)
            {
                roles.push(inputRoleVal);
                $('.roles').append(roleTag);
                $('#options-value').val(roles.join());
            }
            inputRole.val('');
        }
    });

    $(document)
    .on('click', '.roles .role', function(){
        $(this).remove();
        roles = [];
        $('.roles .role').each(function(){
            roles.push($(this).data('role'));
        });
        $('#options-value').val(roles.join());
    });

JS;

$this->registerJs($js, $this::POS_READY);





