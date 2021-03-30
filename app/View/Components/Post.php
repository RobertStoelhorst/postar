<!-- 

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
} -->

<!-- in the tutorial this whole component was deleted and became an annonymous component and 
 instead we defined the props in 
 ( /Users/robertstoelhorst/projects/PHP/posty-web-app/resources/views/components/post.blade.php ) 
 and handed them to the,
 ( /Users/robertstoelhorst/projects/PHP/posty-web-app/resources/views/posts/index.blade.php )
 bringing it in with 
 <x-post :post="$post" /> -->