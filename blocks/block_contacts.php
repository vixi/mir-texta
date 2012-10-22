<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_8">
                <h3>Контактная информация</h3>
                <div class="map">
                    <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=203351695013620162310.0004cb4b91850a02b9f86&amp;ie=UTF8&amp;t=m&amp;ll=53.851717,27.69443&amp;spn=0.003797,0.006437&amp;z=16&amp;output=embed"></iframe>
                </div>
                <address class="contacts">
                <p>г. Минск</p>
                <p>Пр. Партизанский, 178</p>
                <p>Телефон: +375 29 123 45 67</p>
                <p>Факс: +375 29 123 45 67</p>
                <p>E-mail: email@email.com</p>
                </address>
            </div>
            <div class="grid_16 padRT">
                <h3>На связи</h3>
                <form id="contact-form" action="./model/contact_form_processing.php" method="post">
                    <fieldset>
                        <label class="name">
                            <input name="username" type="text" value="Ваше Имя:">
                            <span class="error" style="display: none;">*Неправильное имя</span>
                            <span class="empty" style="display: block;">*Обязательное поле</span>
                            <span class="clear"></span>
                        </label>
                        <label class="email">
                            <input name="subject" type="text" value="E-mail:">
                            <span class="error" style="display: none;">*Неправильный e-mail</span>
                            <span class="empty" style="display: none;">*Обязательное поле</span>
                            <span class="clear"></span>
                        </label>
                        <label class="subject">
                            <input name="subject" type="text" value="Тема сообщения:">
                            <span class="error" style="display: none;">*Неправильная тема</span>
                            <span class="empty" style="display: block;">*Обязательное поле</span>
                            <span class="clear"></span>
                        </label>
                        <label class="message">
                            <textarea>Сообщение:</textarea>
                            <span class="error" style="display: none;">*Неправильное сообщение</span>
                            <span class="empty" style="display: block;">*Обязательное поле</span>
                            <span class="clear"></span>
                        </label>
                        <div class="buttons">
                            <span><a class="button" data-type="reset">Сброс</a></span>
                            <span><a class="button" data-type="submit">Отправить</a></span>
                        </div>
                     </fieldset>
                </form>
            </div>
        </div>
    </div>
</aside>