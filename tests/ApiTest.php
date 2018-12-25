<?php

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Method\EditMessageLiveLocationMethod;
use Greenplugin\TelegramBot\Method\ForwardMessageMethod;
use Greenplugin\TelegramBot\Method\GetChatAdministratorsMethod;
use Greenplugin\TelegramBot\Method\GetChatMemberMethod;
use Greenplugin\TelegramBot\Method\GetChatMethod;
use Greenplugin\TelegramBot\Method\GetFileMethod;
use Greenplugin\TelegramBot\Method\GetMeMethod;
use Greenplugin\TelegramBot\Method\GetUserProfilePhotosMethod;
use Greenplugin\TelegramBot\Method\KickChatMemberMethod;
use Greenplugin\TelegramBot\Method\SendAnimationMethod;
use Greenplugin\TelegramBot\Method\SendAudioMethod;
use Greenplugin\TelegramBot\Method\SendChatActionMethod;
use Greenplugin\TelegramBot\Method\SendContactMethod;
use Greenplugin\TelegramBot\Method\SendDocumentMethod;
use Greenplugin\TelegramBot\Method\SendLocationMethod;
use Greenplugin\TelegramBot\Method\SendMediaGroupMethod;
use Greenplugin\TelegramBot\Method\SendMessageMethod;
use Greenplugin\TelegramBot\Method\SendPhotoMethod;
use Greenplugin\TelegramBot\Method\SendVenueMethod;
use Greenplugin\TelegramBot\Method\SendVideoMethod;
use Greenplugin\TelegramBot\Method\SendVideoNoteMethod;
use Greenplugin\TelegramBot\Method\SendVoiceMethod;
use Greenplugin\TelegramBot\Type\ChatMemberType;
use Greenplugin\TelegramBot\Type\ChatType;
use Greenplugin\TelegramBot\Type\FileType;
use Greenplugin\TelegramBot\Type\MessageType;
use Greenplugin\TelegramBot\Type\UserProfilePhotosType;
use Greenplugin\TelegramBot\Type\UserType;

class ApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {

        $botApi = new BotApi(new Stubs\HttpClient(), '');
        $this->assertInstanceOf(BotApiInterface::class, $botApi);
    }

    private function getBotMock()
    {
        return $this->getMockBuilder(BotApi::class)->disableOriginalConstructor()->setMethods(['call'])->getMock();
    }


    public function testGetMe()
    {
        $method = new GetMeMethod();

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(UserType::class))
            ->willReturn(new UserType());

        $bot->getMe($method);
    }

    public function testSendMessage()
    {
        $method = new SendMessageMethod('id', 'text');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendMessage($method);
    }

    public function testforwardMessage()
    {
        $method = new ForwardMessageMethod('id', 'id', 'id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendForwardMessage($method);
    }

    public function testSendPhoto()
    {
        $method = new SendPhotoMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendPhoto($method);
    }

    public function testSendAudio()
    {
        $method = new SendAudioMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendAudio($method);
    }

    public function testSendDocument()
    {
        $method = new SendDocumentMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendDocument($method);
    }

    public function testSendVideo()
    {
        $method = new SendVideoMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVideo($method);
    }

    public function testSendAnimation()
    {
        $method = new SendAnimationMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendAnimation($method);
    }

    public function testSendVoice()
    {
        $method = new SendVoiceMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVoice($method);
    }

    public function testSendVideoNote()
    {
        $method = new SendVideoNoteMethod('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVideoNote($method);
    }

    public function testSendMediaGroup()
    {
        $method = new SendMediaGroupMethod('id', []);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class.'[]'))
            ->willReturn([]);

        $bot->sendMediaGroup($method);
    }

    public function testSendLocation()
    {
        $method = new SendLocationMethod('id', 0.1, 0.1);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendLocation($method);
    }

    /*
    public function testEditMessageLiveLocation()
    {
        $method = new EditMessageLiveLocationMethod(0.1, 0.1, ['inline_message_id' => 1]);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->editMessageLiveLocation($method);
    }
    */

    /*
    public function testStopMessageLiveLocation()
    {
        $method = new EditMessageLiveLocationMethod(0.1, 0.1, ['inline_message_id' => 1]);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->stopMessageLiveLocation($method);
    }
    */

    public function testSendVenue()
    {
        $method = new SendVenueMethod('id', 0.1, 0.1, 'title', 'address');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVenue($method);
    }

    public function testSendContact()
    {
        $method = new SendContactMethod('id', 'phone number', 'first name');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendContact($method);
    }

    /*
    public function testSendChatAction()
    {
        $method = new SendChatActionMethod('id', 'action');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendChatAction($method);
    }
    */

    public function testGetUserProfilePhotos()
    {
        $method = new GetUserProfilePhotosMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(UserProfilePhotosType::class))
            ->willReturn(new UserProfilePhotosType());

        $bot->getUserProfilePhotos($method);
    }

    public function testGetFile()
    {
        $method = new GetFileMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->getFile($method);
    }

    /*
    public function testKickChatMember()
    {
        $method = new KickChatMemberMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->kickChatMember($method);
    }
    */

    /*
    public function testUnbanChatMember()
    {
        $method = new UnbanChatMemberMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->unbanChatMember($method);
    }
    */

    /*
    public function testRestrictChatMember()
    {
        $method = new RestrictChatMemberMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->restrictChatMember($method);
    }
    */

    /*
    public function testPromoteChatMember()
    {
        $method = new PromoteChatMemberMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->promoteChatMember($method);
    }
    */

    /*
    public function testExportChatInviteLink()
    {
        $method = new ExportChatInviteLinkMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->exportChatInviteLink($method);
    }
    */

    /*
    public function testSetChatPhoto()
    {
        $method = new SetChatPhotoMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->setChatPhoto($method);
    }
    */

    /*
    public function testSetChatPhoto()
    {
        $method = new SetChatPhotoMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->setChatPhoto($method);
    }
    */

    /*
    public function testDeleteChatPhoto()
    {
        $method = new DeleteChatPhotoMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->deleteChatPhoto($method);
    }
    */

    /*
    public function testSetChatTitle()
    {
        $method = new SetChatTitleMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->setChatTitle($method);
    }
    */

    /*
    public function testSetChatDescription()
    {
        $method = new SetChatDescriptionMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->setChatDescription($method);
    }
    */

    /*
    public function testPinChatMessag()
    {
        $method = new PinChatMessageMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->pinChatMessage($method);
    }
    */

    /*
    public function testUnpinChatMessage()
    {
        $method = new UnpinChatMessageMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->unpinChatMessage($method);
    }
    */

    /*
    public function testLeaveChat()
    {
        $method = new LeaveChatMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->leaveChat($method);
    }
    */

    public function testGetChat()
    {
        $method = new GetChatMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatType::class))
            ->willReturn(new ChatType());

        $bot->getChat($method);
    }

    public function testGetChatAdministrators()
    {
        $method = new GetChatAdministratorsMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMemberType::class.'[]'))
            ->willReturn([]);

        $bot->getChatAdministrators($method);
    }

    /*
    public function testGetChatMembersCount()
    {
        $method = new GetChatMembersCountMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMember::class.'[]'))
            ->willReturn([]);

        $bot->getChatMembersCount($method);
    }
    */

    public function testGetChatMember()
    {
        $method = new GetChatMemberMethod('id', 'id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMemberType::class))
            ->willReturn(new ChatMemberType());

        $bot->getChatMember($method);
    }

    /*
    public function testSetChatStickerSet()
    {
        $method = new SetChatStickerSetMethod('id', 'name');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMember::class))
            ->willReturn(new ChatMember());

        $bot->setChatStickerSet($method);
    }
    */

    /*
    public function testDeleteChatStickerSet()
    {
        $method = new DeleteChatStickerSetMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMember::class))
            ->willReturn(new ChatMember());

        $bot->deleteChatStickerSet($method);
    }
    */

    /*
    public function testAnswerCallbackQuery()
    {
        $method = new AnswerCallbackQueryMethod('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMember::class))
            ->willReturn(new ChatMember());

        $bot->answerCallbackQuery($method);
    }
    */
}