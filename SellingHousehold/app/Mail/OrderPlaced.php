<?php

namespace App\Mail;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $orderData;
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'THÔNG TIN ĐẶT HÀNG',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
    public function placeOrder(Request $request)
    {
        // Lấy dữ liệu từ form
        $orderData = $request->all();
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Địa chỉ email không hợp lệ.');
        }
        // Gửi email
        Mail::to($email)->send(new OrderPlaced($orderData));

        // Xử lý logic tiếp theo, ví dụ như lưu đơn hàng vào cơ sở dữ liệu
        return redirect()->back()->with('success', 'Đơn hàng của bạn đã được xử lý!');
    }

    public function build() {
        return $this->view('emails.email')->subject('Đơn hàng của bạn đã được đặt')->with(['orderData' => $this->orderData]);
    }


}
