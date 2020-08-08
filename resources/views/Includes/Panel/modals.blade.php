<div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostLabel">اخطار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @isset($title)
                {{$title}}
                @else
                برای حذف این مورد مطمئن هستید
                @endisset
            </div>
            <div class="modal-footer">
                <form action="{{route('Panel.DeletePost')}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="post_id" id="post_id" value="">
                    <button href="#" type="submit" class=" btn btn-danger text-white">حذف! </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteGallery" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGalleryLabel">اخطار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @isset($title)
                {{$title}}
                @else
                برای حذف این مورد مطمئن هستید
                @endisset
            </div>
            <div class="modal-footer">
                <form action="{{route('Panel.DeleteGallery')}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="gallery_id" id="gallery_id" value="">
                    <button href="#" type="submit" class=" btn btn-danger text-white">حذف! </button>
                </form>
            </div>
        </div>
    </div>
</div>