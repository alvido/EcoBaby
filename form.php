<?php
/*
Template Name: Form Page
*/
?>

<?php get_header(); ?>

<main class="main">
    <section class="form">
        <div class="container">
            <h2>
                <?php the_title(); ?>
            </h2>
            <form action="">
                <div class="form__step">
                    <h3>
                        Данные женщины
                    </h3>
                    <div class="form__content">
                        <label for="womanName">
                            Имя
                            <input class="form__input" type="text" id="womanName" placeholder="Lyla">
                            <span class="error-message"></span>
                        </label>
                        <label for="womanSurname">
                            Фамилия
                            <input class="form__input" type="text" id="womanSurname" placeholder="Haley">
                            <span class="error-message"></span>
                        </label>

                        <label for="womanStatus">
                            Семейное положение
                            <select id="womanStatus">
                                <option value="" disabled selected>Выберите опцию</option>
                                <option value="1">Опция 1</option>
                                <option value="2">Опция 2</option>
                                <option value="3">Опция 3</option>
                            </select>
                        </label>
                        <label for="womanChildren">
                            Количество детей
                            <input class="form__input" type="number" id="womanChildren" placeholder="0">
                            <span class="error-message"></span>
                        </label>

                        <label for="womanPhone">
                            Телефон
                            <input class="form__input" type="tel" id="womanPhone" placeholder="946-501-2341">
                            <span class="error-message"></span>
                        </label>
                        <label for="womanEmail">
                            Электронная почта
                            <input class="form__input" type="email" id="womanEmail" placeholder="example@mail.com">
                            <span class="error-message"></span>
                        </label>

                        <label for="womanCity">
                            Город
                            <input class="form__input" type="text" id="womanCity" placeholder="Grantborough">
                            <span class="error-message"></span>
                        </label>
                        <div class="address">
                            <label for="womanStreet">
                                Улица
                                <input class="form__input" type="text" id="womanStreet" placeholder="Hilll Island">
                                <span class="error-message"></span>
                            </label>
                            <label class="small" for="womanHouse">
                                №
                                <input class="form__input" type="number" id="womanHouse" placeholder="961">
                                <span class="error-message"></span>
                            </label>
                        </div>

                        <div class="medical">
                            <label for="womanBloodtype">
                                Группа крови
                                <input class="form__input" type="number" id="womanBloodtype" placeholder="1">
                                <span class="error-message"></span>
                            </label>
                            <label for="womanInsurance">
                                Больничная касса
                                <select id="womanInsurance">
                                    <option value="" disabled selected>Выберите опцию</option>
                                    <option value="1">Опция 1</option>
                                    <option value="2">Опция 2</option>
                                    <option value="3">Опция 3</option>
                                </select>
                            </label>
                            <label for="womanDoctor">
                                Имя гинеколога
                                <input class="form__input" type="text" id="womanDoctor" placeholder="Sheldon Leffler">
                                <span class="error-message"></span>
                            </label>
                        </div>


                    </div>
                </div>

                <div class="form__step">
                    <h3>
                        Данные супруга / донора спермы
                    </h3>
                    <div class="form__content">
                        <label for="manName">
                            Имя
                            <input class="form__input" type="text" id="manName" placeholder="Rahsaan">
                            <span class="error-message"></span>
                        </label>
                        <label for="manSurname">
                            Фамилия
                            <input class="form__input" type="text" id="manSurname" placeholder="Quigley">
                            <span class="error-message"></span>
                        </label>

                        <label for="manStatus">
                            Семейное положение
                            <select id="manStatus">
                                <option value="" disabled selected>Выберите опцию</option>
                                <option value="1">Опция 1</option>
                                <option value="2">Опция 2</option>
                                <option value="3">Опция 3</option>
                            </select>
                        </label>
                        <label for="manChildren">
                            Количество детей
                            <input class="form__input" type="number" id="manChildren" placeholder="0">
                            <span class="error-message"></span>
                        </label>

                        <label for="manPhone">
                            Телефон
                            <input class="form__input" type="tel" id="manPhone" placeholder="946-501-2341">
                            <span class="error-message"></span>
                        </label>
                        <label for="manEmail">
                            Электронная почта
                            <input class="form__input" type="email" id="manEmail" placeholder="example@mail.com">
                            <span class="error-message"></span>
                        </label>

                        <label for="manCity">
                            Город
                            <input class="form__input" type="text" id="manCity" placeholder="Grantborough">
                            <span class="error-message"></span>
                        </label>
                        <div class="address">
                            <label for="manStreet">
                                Улица
                                <input class="form__input" type="text" id="manStreet" placeholder="Hilll Island">
                                <span class="error-message"></span>
                            </label>
                            <label class="small" for="manHouse">
                                №
                                <input class="form__input" type="number" id="manHouse" placeholder="961">
                                <span class="error-message"></span>
                            </label>
                        </div>

                        <div class="medical">
                            <label class="" for="manBloodtype">
                                Группа крови
                                <input class="form__input" type="number" id="manBloodtype" placeholder="1">
                                <span class="error-message"></span>
                            </label>
                            <label class="" for="manInsurance">
                                Больничная касса
                                <select id="manInsurance">
                                    <option value="" disabled selected>Выберите опцию</option>
                                    <option value="1">Опция 1</option>
                                    <option value="2">Опция 2</option>
                                    <option value="3">Опция 3</option>
                                </select>
                            </label>
                            <label class="" for="manDoctor">
                                Имя семейного врача
                                <input class="form__input" type="text" id="manDoctor" placeholder="Sheldon Leffler">
                                <span class="error-message"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form__step">
                    <h3>
                        Ключевые вопросы
                    </h3>
                    <div class="form__content">
                        <label for="reason" class="full">
                            Причина обращения в нашу компанию (рекомендация врача/другое)
                            <textarea name="" id="reason" placeholder="Опишите причину обращения"></textarea>
                            <span class="error-message"></span>
                        </label>

                        <label for="ecoText" class="full">
                            Прежний опыт искусственного оплодотворения (ЭКО)
                            <div class="wrap">
                                <label class="form_text custom-radio" for="noeco">
                                    <input type="radio" class="form__input" id="noeco" name="eco" value="no">
                                    <span class="radiomark"></span>
                                    Нет
                                </label>
                                <label class="form_text custom-radio" for="eco">
                                    <input type="radio" class="form__input" id="eco" name="eco" value="yes">
                                    <span class="radiomark"></span>
                                    Есть
                                </label>
                            </div>
                            <textarea class="hidden-textarea" name="" id="ecoText" placeholder="Расскажите детали прежнего опыта"></textarea>

                            <div class="form__content hidden-textarea">

                                <label for="when">
                                    Когда
                                    <input class="form__input" type="text" id="when" placeholder="02.07.2023">
                                    <span class="error-message"></span>
                                </label>
                                <label for="result">
                                    Результат
                                    <input class="form__input" type="text" id="result" placeholder="example@mail.com">
                                    <span class="error-message"></span>
                                </label>

                                <label for="sperm">
                                    Кто донор спермы
                                    <input class="form__input" type="text" id="sperm" placeholder="Dixie Schneider">
                                    <span class="error-message"></span>
                                </label>
                                <label for="ovum">
                                    Кто донор яйцеклетки
                                    <input class="form__input" type="text" id="ovum" placeholder="Kyle Thiel">
                                    <span class="error-message"></span>
                                </label>

                                <label for="clinic">
                                    Где произведена подсадка
                                    <input class="form__input" type="text" id="clinic" placeholder="Укажите клинику">
                                    <span class="error-message"></span>
                                </label>
                                <label for="notWork">
                                    Если не получилось, укажите причину
                                    <input class="form__input" type="text" id="notWork" placeholder="Опишите причину">
                                    <span class="error-message"></span>
                                </label>
                        </label>
                    </div>

                </div>
        </div>

        <div class="form__step">
            <h3>
                Медицинская информация женщины
            </h3>
            <div class="form__content">
                <label for="sicknessText" class="full">
                    Хронические заболевания
                    <div class="wrap">
                        <label class="form_text custom-radio" for="noSickness">
                            <input type="radio" class="form__input" id="noSickness" name="sickness" value="no">
                            <span class="radiomark"></span>
                            Нет
                        </label>
                        <label class="form_text custom-radio" for="yesSickness">
                            <input type="radio" class="form__input" id="yesSickness" name="sickness" value="yes">
                            <span class="radiomark"></span>
                            Есть
                        </label>
                    </div>
                    <textarea class="hidden-textarea" name="" id="sicknessText" placeholder="Перечислите названия заболеваний"></textarea>
                    <span class="error-message"></span>
                </label>

                <label for="medicinesText" class="full">
                    Постоянные лекарства
                    <div class="wrap">
                        <label class="form_text custom-radio" for="noMedicines">
                            <input type="radio" class="form__input" id="noMedicines" name="medicines" value="no">
                            <span class="radiomark"></span>

                            Нет
                        </label>
                        <label class="form_text custom-radio" for="yesMedicines">
                            <input type="radio" class="form__input" id="yesMedicines" name="medicines" value="yes">
                            <span class="radiomark"></span>

                            Есть
                        </label>
                    </div>
                    <textarea class="hidden-textarea" name="" id="medicinesText" placeholder="Перечислите названия лекарств"></textarea>
                    <span class="error-message"></span>
                </label>

                <label for="allergiesText" class="full">
                    Аллергии
                    <div class="wrap">
                        <label class="form_text custom-radio" for="noAllergies">
                            <input type="radio" class="form__input" id="noAllergies" name="allergies" value="no">
                            <span class="radiomark"></span>

                            Нет
                        </label>
                        <label class="form_text custom-radio" for="yesAllergies">
                            <input type="radio" class="form__input" id="yesAllergies" name="allergies" value="yes">
                            <span class="radiomark"></span>

                            Есть
                        </label>
                    </div>
                    <textarea class="hidden-textarea" name="" id="allergiesText" placeholder="Перечислите названия лекарств"></textarea>
                    <span class="error-message"></span>
                </label>
            </div>
        </div>

        <button class="button" type="submit">Отправить анкету</button>
        </form>
        </div>
    </section>
</main>

<?php get_footer(); ?>