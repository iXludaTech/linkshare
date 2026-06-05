<?php

namespace App\Controllers;

use App\Models\Link;
use Legato\Framework\Request;

class LinkModerationController extends BaseController
{
    public function index()
    {
        $links = Link::paginated(15);

        return view('admin/links/index', compact('links'));
    }

    public function approve(Request $request, $id)
    {
        $link = Link::find($id);

        if ($link) {
            $link->approved = 1;
            $link->approved_at = date('Y-m-d H:i:s');
            $link->save();

            flash('success', 'Link approved successfully.');
        }

        return redirectTo('/admin/links');
    }

    public function destroy($id)
    {
        $link = Link::find($id);

        if ($link) {
            $link->delete();
            flash('success', 'Link deleted successfully.');
        }

        return redirectTo('/admin/links');
    }
}
