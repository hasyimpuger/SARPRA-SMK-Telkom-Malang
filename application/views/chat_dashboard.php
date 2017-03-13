<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chat Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/styles.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/jquery.min.js') ?>"></script>
</head>
<body>

<div id="container">
    <h1>
        Selamat datang <?php echo $this->session->userdata('USERNAME'); ?>!
    </h1>
    
    <div id="body">
        <p>Silahkan pilih teman:</p>
        <table style="width: 100%" id="table-friend">
            <?php foreach ($teman->result() as $item) { ?>
            <tr>
                <td><a href="javascript:;" data-friend="<?= $item->ID ?>"><?= $item->USERNAME ?></a></td>
            </tr>
            <?php } ?>
        </table>
        <br />
        <br />
        <a href="<?= site_url('welcome/logout') ?>">Logout</a>
    </div>
</div>


<!-- TEMPLATE -->
<div id="wgt-container-template" style="display: none">
    <div class="msg-wgt-container">
        <div class="msg-wgt-header">
            <a href="javascript:;" class="online"></a>
            <a href="javascript:;" class="name"></a>
            <a href="javascript:;" class="close">x</a>
        </div>
        <div class="msg-wgt-message-container">
            <table width="100%" class="msg-wgt-message-list">
            </table>
        </div>
        <div class="msg-wgt-message-form">
            <textarea name="message" placeholder="Type your message. Press Shift + Enter for newline"></textarea>
        </div>
    </div>
</div>

<script type="text/x-template" id="msg-template" style="display: none">
    <tbody>
        <tr class="msg-wgt-message-list-header">
            <td rowspan="2"><img src="<?= base_url('assets/avatar.png') ?>"></td>
            <td class="name"></td>
            <td class="time"></td>
        </tr>
        <tr class="msg-wgt-message-list-body">
            <td colspan="2"></td>
        </tr>
        <tr class="msg-wgt-message-list-separator"><td colspan="3"></td></tr>
    </tbody>
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    var chatPosition = [
        false, // 1
        false, // 2
        false, // 3
        false, // 4
        false, // 5
        false, // 6
        false, // 7
        false, // 8
        false, // 9
        false // 10
    ];

    // New chat
    $(document).on('click', 'a[data-friend]', function(e) {
        var $data = $(this).data();
        if ($data.friend !== undefined && chatPosition.indexOf($data.friend) < 0) {
            var posRight = 0;
            var position;
            for(var i in chatPosition) {
                if (chatPosition[i] == false) {
                    posRight = (i * 270) + 20;
                    chatPosition[i] = $data.friend;
                    position = i;
                    break;
                }
            }
            var tpl = $('#wgt-container-template').html();
            var tplBody = $('<div/>').append(tpl);
            tplBody.find('.msg-wgt-container').addClass('msg-wgt-active');
            tplBody.find('.msg-wgt-container').css('right', posRight + 'px');
            tplBody.find('.msg-wgt-container').attr('data-chat-position', position);
            tplBody.find('.msg-wgt-container').attr('data-chat-with', $data.friend);
            $('body').append(tplBody.html());
            initializeChat();
        }
    });

    // Minimize Maximize
    $(document).on('click', '.msg-wgt-header > a.name', function() {
        var parent = $(this).parent().parent();
        if (parent.hasClass('minimize')) {
            parent.removeClass('minimize')
        } else {
            parent.addClass('minimize');
        }
    });

    // Close
    $(document).on('click', '.msg-wgt-header > a.close', function() {
        var parent = $(this).parent().parent();
        var $data = parent.data();
        parent.remove();
        chatPosition[$data.chatPosition] = false;
        setTimeout(function() {
            initializeChat();
        }, 1000)
    });

    var chatInterval = [];

    var initializeChat = function() {
        $.each(chatInterval, function(index, val) {
            clearInterval(chatInterval[index]);   
        });

        $('.msg-wgt-active').each(function(index, el) {
            var $data = $(this).data();
            var $that = $(this);
            var $container = $that.find('.msg-wgt-message-container');

            chatInterval.push(setInterval(function() {
                $.post('<?= site_url('chat/getChats') ?>', {chatWith: $data.chatWith}, function(data, textStatus, xhr) {
                    $that.find('a.name').text(data.name);
                    $.each(data.chats, function(index, val) {
                        var tpl = $('#msg-template').html();
                        var tplBody = $('<div/>').append(tpl);
                        var id = (val.chat_id +'_'+ val.send_by +'_'+ val.send_to).toString();
                        
                        if ($that.find('#'+ id).length == 0) {
                            tplBody.find('tbody').attr('id', id); // set class
                            tplBody.find('td.name').text(val.name); // set name
                            tplBody.find('td.time').text(val.time); // set time
                            tplBody.find('.msg-wgt-message-list-body > td').text(val.message); // set message
                            $that.find('.msg-wgt-message-list').append(tplBody.html()); // append message

                            $container.animate({"scrollTop": $container[0].scrollHeight}, 'slow'); // scroll bottom (bug on first load chats)
                        }
                    });
                });
            }, 1000));

            $that.find('textarea').on('keydown', function(e) {
                var $textArea = $(this);
                if (e.keyCode === 13 && e.shiftKey === false) {
                    $.post('<?= site_url('chat/sendMessage') ?>', {message: $textArea.val(), chatWith: $data.chatWith}, function(data, textStatus, xhr) {
                    });
                    $textArea.val(''); // clear input

                    e.preventDefault(); // stop 
                    return false;
                }
            });
        });
    }

    // on load
    initializeChat();
});
</script>

</body>
</html>
