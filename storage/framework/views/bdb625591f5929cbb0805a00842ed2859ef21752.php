<?php $__env->startSection('content'); ?>

<?php echo $__env->make('Includes.Panel.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php echo $__env->make('Includes.Panel.Gallerymenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5 class="text-center">مدیریت گالری تصاویر</h5>
            <hr>
        </div>

        <table id="example1" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                  <th></th>
                    <th> Title</th>
                    <th>Images Counts</th>
                    <th>Created At</th>
                   
                   
                    <th></th>


                </tr>
            </thead>

            <tbody>
                 <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <a href="#" class="text-primary"><?php echo e($gallery->name); ?></a>
                    </td>
                    <td><?php echo e($gallery->images->count()); ?></td>
                   
                    <td>
                 <?php echo e($gallery->created_at->format('d M')); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('Panel.EditGallery',$gallery)); ?>" class="btn btn-sm btn-info">ویرایش</a>
                        <a href="#" data-id="<?php echo e($gallery->id); ?>" title="حذف " data-toggle="modal" data-target="#deleteGallery"
                            class="btn btn-sm btn-danger   m-2">

                            <i class="fa fa-trash"></i>

                        </a>

                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>

    </div>



</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $('table input[type="checkbox"]').change(function(){
            if( $(this).is(':checked')){
            $(this).parents('tr').css('background-color','#41f5e07d');
            }else{
                $(this).parents('tr').css('background-color','');

            }
            array=[]
            $('table input[type="checkbox"]').each(function(){
                if($(this).is(':checked')){
                array.push($(this).attr('data-id'))

               }
               if(array.length !== 0){
                $('.delete-edit').show()
                if (array.length !== 1) {
                    $('.container_icon').removeClass('justify-content-end')
                    $('.container_icon').addClass('justify-content-between')
                    $('.edit-personal').hide()
                }else{

                    $('.container_icon').removeClass('justify-content-end')
                    $('.container_icon').addClass('justify-content-between')
                    $('.edit-personal').show()
                    
                   
                }
            }
            else{
                $('.container_icon').removeClass('justify-content-between')
                $('.container_icon').addClass('justify-content-end')
                $('.delete-edit').hide()
            }
        })
            
    })
    
         $('#deleteGallery').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('id')
            $('#gallery_id').val(recipient)

    })


    //  $('.deleteposts').click(function(e){
    //         e.preventDefault()

    //         data = { array:array, _method: 'delete',_token: "<?php echo e(csrf_token()); ?>" };
    //         url='<?php echo e(route('Panel.DeletePost')); ?>';
    //         request = $.post(url, data);
    //         request.done(function(res){
    //         location.reload()
    //     });
    // })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\radio\resources\views/Panel/Photos/list.blade.php ENDPATH**/ ?>