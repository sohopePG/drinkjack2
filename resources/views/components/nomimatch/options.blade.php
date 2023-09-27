@if($myRec)

    <details class="tweet-option absolute top-5 right-3 z-40 border border-gray-400 rounded-md bg-white">
        <summary class="list-none flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
              </svg>
        </summary>
        <div class="bg-white rounded shadow-md absolute right-0 w-24 z-20 pt-1 pb-1">
            <div>
                <a href="{{route('nomimatch.rec_edit',$recruitment)}}" class="flex items-center pt-1 pb-1 pl-3 pr-3 hover:bg-gray-100">


<svg role="img" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" aria-labelledby="editIconTitle" stroke="#000000" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"> <title id="editIconTitle">Edit</title> <path d="M18.4142136 4.41421356L19.5857864 5.58578644C20.366835 6.36683502 20.366835 7.63316498 19.5857864 8.41421356L8 20 4 20 4 16 15.5857864 4.41421356C16.366835 3.63316498 17.633165 3.63316498 18.4142136 4.41421356zM14 6L18 10"/> </svg>
                    <span>編集</span>
                </a>
            </div>
            <div>
                <form action="{{route('nomimatch.rec_delete',$recruitment)}}" method="post" onclick="return confirm('削除しますか?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="flex items-center w-full pt-1 pb-1 pl-3 pr-3 hover:bg-gray-199">

<svg role="img" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" aria-labelledby="binIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"> <title id="binIconTitle">Bin</title> <path d="M19 6L5 6M14 5L10 5M6 10L6 20C6 20.6666667 6.33333333 21 7 21 7.66666667 21 11 21 17 21 17.6666667 21 18 20.6666667 18 20 18 19.3333333 18 16 18 10"/> </svg>
                        <span>削除</span>
                    </button>
                </form>
            </div>
        </div>
    </details>

@endif
@once
@push('css')
<style>
    .tweet-option > summary{
        list-style:none;
        cursor: pointer;
    }
    .tweet-option[open]> summary::before{
        position: fixed;
        top:0;
        right: 0;
        bottom:0;
        left:0;
        z-index: 10;
        display: block;
        content: "";
        background: transparent;
    }
</style>
@endpush
@endonce
