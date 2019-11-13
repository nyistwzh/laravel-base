<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;

class AddPaginationLinksToResponse
{
    /**
     * 处理响应
     * 去除分页中的links，添加状态码和消息.
     *
     * @param ResponseWasMorphed $event
     *
     * @author 王志豪
     */
    public function handle(ResponseWasMorphed $event)
    {
        if (isset($event->content['meta']['pagination'])) {
            unset($event->content['meta']['pagination']['links']);
        }

        if ($event->response->status() < 400) {
            if (is_array($event->content)) {
                if (!isset($event->content['data'])) {
                    $event->content = ['data' => $event->content];
                }
                $event->content['status_code'] = 200;
                $event->content['message']     = trans('system.successful_operation');
            }
        }
    }
}
