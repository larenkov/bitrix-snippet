<?php

class CAllIBlock
{
    /**
     * Текст последней ошибки
     *
     * @var string
     */
    public $LAST_ERROR = '';

    /**
     * Добавляет в административную панель кнопки для быстрого перехода к редактированию объектов модуля информационных блоков, с учётом прав доступа. Также состав кнопок различен для разных режимов панели.
     *
     * @param integer $IBLOCK_ID Код информационного блока. если задан (больше нуля), то в панель добавляются кнопки на изменение параметров этого информационного блока, на добавление в него разделов и элементов.
     * @param integer $ELEMENT_ID Код элемента информационного блока. если задан (больше нуля), то в панель добавляются кнопки на редактирование этого элемента и просмотр его истории изменений (при установленном модуле документооборота).
     * @param integer|string $SECTION_ID Код раздела информационного блока. если задан, то в панель добавляются кнопки на изменение свойств этого раздела.
     * @param string $type Тип информационного блока. если задан, то в панель добавляется кнопка добавления нового информационного блока.
     * @param boolean $bGetIcons Если параметр равен true, то вместо добавления кнопок в панель метод возвращает массив описывающий кнопки.
     * @param string $componentName Если задан, то будет выводиться соответствующая подпись группирующая действия. Если не задан, то название будет определено из описания компонента 2.0, вызвавшего этот метод.
     * @param array $arLabels Если задан, то элементы этого массива будут использованы для вывода названий кнопок и всплывающих подсказок.
     * @return mixed
     */
    public static function ShowPanel(
        int $IBLOCK_ID = 0,
        int $ELEMENT_ID = 0,
        $SECTION_ID = "",
        string $type = "news",
        bool $bGetIcons = false,
        string $componentName = "",
        array $arLabels = []
    ) { }

    /**
     * Метод добавляет в панель управления кнопки, отвечающие за управление элементами инфоблока (в методе производится вызов CMain::AddPanelButton).
     *
     * @param string $mode Режим отображения административной панели. Возвращается методом CMain::GetPublicShowMode.
     * @param string $componentName Название компонента, который регистрирует кнопки. Возвращается методом CBitrixComponent::GetName.
     * @param array $arButtons Массив кнопок, которые можно зарегистрировать с учётом текущих прав пользователя. Формируется методом CIBlock::GetPanelButtons.
     * @return void
     */
    public static function AddPanelButtons(
        string $mode,
        string $componentName,
        array $arButtons
    ): void
    { }

    /**
     * Метод возвращает массив, описывающий набор кнопок для управления элементами инфоблока.
     *
     * @param integer $IBLOCK_ID Идентификатор инфоблока, которому принадлежит элемент.
     * @param integer $ELEMENT_ID Идентификатор текущего элемента информационного блока.
     * @param integer $SECTION_ID Идентификатор раздела инфоблока (при наличии).
     * @param array $arOptions Массив, содержащий локализацию названий и всплывающих подсказок к ним. Должен содержать секцию LABELS, в которой ключами будут названия действий с элементами и разделами информационных блоков с префиксами TEXT и TITLE (ELEMENT_ADD_TEXT и ELEMENT_ADD_TITLE).
     * Если массив отсутствует, то настройки локализации берутся из настроек информационных блоков, которые возвращаются методом CIBlock::GetArrayByID.
     * @return array
     */
    public static function GetPanelButtons(
        int $IBLOCK_ID = 0,
        int $ELEMENT_ID = 0,
        int $SECTION_ID = 0,
        array $arOptions = []
    ): array
    {
        return [];
    }

    /**
     * Метод возвращает список сайтов к которым привязан инфоблок.
     * @param integer $iblock_id Идентификатор информационного блока.
     * @return CDBResult
     */
    public static function GetSite(int $iblock_id): CDBResult
    {
        return new CDBResult();
    }

    /**
     * Возвращает информационный блок по его коду ID.
     *
     * @param integer $ID Код информационного блока.
     * @return CDBResult
     */
    public static function GetByID(int $ID): CDBResult
    {
        return new CDBResult();
    }

    /**
     * Возвращает массив полей информационного блока.
     * Примечание: если инфоблока с таким ID не существует, то метод вернет false.
     * @param integer $ID Идентификатор информационного блока 
     * @param string $FIELD Идентификатор поля. Если этот параметр задан, то метод вернет значение конкретного поля.
     * @return mixed
     */
    public static function GetArrayByID(int $ID, string $FIELD = "")
    { }

    /**
     * Метод добавляет новый информационный блок. Модифицировать поля, а также отменить создание инфоблока можно добавив обработчик события OnBeforeIBlockAdd. После успешного добавления инфоблока вызываются обработчики события OnAfterIBlockAdd.
     *
     * @param array $arFields Массив Array("поле"=>"значение", ...). Содержит значения всех полей информационного блока.
     * Дополнительно в поле SITE_ID должен находиться массив идентификаторов сайтов, к которым привязан добавляемый информационный блок.
     * Кроме того, с помощью поля "GROUP_ID", значением которого должен быть массив соответствий кодов групп правам доступа, можно установить права для разных групп на доступ к информационному блоку(см. CIBlock::SetPermission()).
     * Если задано поле "FIELDS", то будут выполнены настройки полей инфоблока (см. CIBlock::SetFields).
     * Кроме того, предусмотрено поле "VERSION", определяющее способ хранения значений свойств элементов инфоблока (1 - в общей таблице | 2 - в отдельной). По умолчанию принимает значение 1.
     * Если необходимо добавить инфоблок с поддержкой бизнес-процессов, то следует указать два дополнительных поля: BIZPROC, принимающее значение Y, и WORKFLOW, принимающее значение N.
     * @return integer|boolean Метод возвращает код добавленного информационного блока, если добавление прошло успешно, при возникновении ошибки метод вернет false, а в свойстве объекта LAST_ERROR будет содержаться текст ошибки.
     */
    public function Add(array $arFields)
    { }

    /**
     * Метод изменяет параметры информационного блока с кодом ID. Модифицировать поля, а также отменить изменение параметров можно добавив обработчик события OnBeforeIBlockUpdate. После успешного добавления инфоблока вызываются обработчики события OnAfterIBlockUpdate.
     *
     * @param integer $ID ID изменяемого информационного блока.
     * @param array $arFields Массив Array("поле"=>"значение", ...). Содержит значения всех полей информационного блока.
     * Дополнительно в поле SITE_ID должен находиться массив идентификаторов сайтов, к которым привязан изменяемый информационный блок.
     * Кроме того, с помощью поля "GROUP_ID", значением которого должен быть массив соответствий кодов групп правам доступа, можно установить права для разных групп на доступ к информационному блоку(см. CIBlock::SetPermission()).
     * Если задано поле "FIELDS", то будут выполнены настройки полей инфоблока (см. CIBlock::SetFields). 
     * @return boolean Метод возвращает true если изменение прошло успешно, при возникновении ошибки метод вернет false, а в свойстве LAST_ERROR объекта будет содержаться текст ошибки. 
     */
    public function Update(int $ID, array $arFields): bool
    {
        return false;
    }

    /**
     * Метод удаляет информационный блок.
     *
     * @param integer $ID Код информационного блока.
     * @return boolean Возвращается true в случае успешного удаления и false - в противном случае. Удаление можно отменить в обработчике события OnBeforeIBlockDelete. 
     */
    public static function Delete(int $ID): bool
    {
        return false;
    }

    /**
     * Метод устанавливает права доступа arPERMISSIONS для информационного блока IBLOCK_ID. Перед этим все права установленные ранее снимаются. Права устанавливаются только для инфоблоков с простыми правами.
     *
     * @param integer $IBLOCK_ID Код информационного блока.
     * @param array $arGROUP_ID Массив вида Array("код группы"=>"право доступа", ....)
     * @return void
     */
    public static function SetPermission(int $IBLOCK_ID, array $arGROUP_ID): void
    { }

    /**
     * Метод устанавливает значения дополнительных полей инфоблока. Вызывается в методах CIBlock::Add и CIBlock::Update.
     * Примечание: значения полей не указанных в параметре arFields сохраняются.
     *
     * @param integer $ID Код инфоблока
     * @param array $arFields Массив вида array("Поле" => "Значение" ...)
     * @return void
     */
    public function SetMessages(int $ID, array $arFields): void
    { }

    /**
     * Метод возвращает значения дополнительных полей инфоблока.
     *
     * @param integer $ID Код инфоблока.
     * @param string $type Код типа инфоблоков.
     * Параметр используется только тогда, когда инфоблок с указанным ID не найден или указан 0. В этом случае берутся значения дополнительных полей из этого типа.
     * Если ID задан и такой инфоблок есть, то параметр type игнорируется.
     * @return array Массив значений дополнительных полей инфоблока.
     */
    public static function GetMessages(int $ID, string $type=""): array
    {
        return [];
    }

    /**
     * Метод изменяет описание полей элементов инфоблоков. С ее помощью можно отметить поля как обязательные для заполнения, а также установить значение по умолчанию для новых элементов.
     * Примечание: обязательность полей будет проверена в методах CIBlock::Add и CIBlock::Update, а значение по умолчанию будет установлено только в форме редактирования элемента в административной части сайта.
     *
     * @param integer $ID Код информационного блока.
     * @param array $arFields Массив вида array("код поля" => "значение" ...), где значение это массив содержащий следующие элементы:
     * IS_REQUIRED - признак обязательности заполнения (Y|N).
     * DEFAULT_VALUE - значение поля по умолчанию.
     * @return void
     */
    public static function SetFields(int $ID, array $arFields): void
    { }

    /**
     * Метод возвращает описание полей элементов инфоблоков. Структура массива описана в CIBlock::SetFields.
     *
     * @param integer $ID Код информационного блока.
     * @return array
     */
    public static function GetFields(int $ID): array
    {
        return [];
    }

    /**
     * Возвращает свойства информационного блока iblock_id с возможностью сортировки и дополнительной фильтрации.
     * Примечание: по умолчанию метод учитывает права доступа к информационному блоку. Для отключения проверки необходимо в параметре arFilter передать ключ "CHECK_PERMISSIONS" со значением "N".
     *
     * @param integer $ID Код информационного блока.
     * @param array $arOrder Массив для сортировки результата. Содержит пары "поле сортировки"=>"направление сортировки". Поля сортировки см. CIBlockProperty::GetList().
     * @param array $arFilter Массив вида array("фильтруемое поле"=>"значение фильтра" [, ...]). Фильтруемые поля и их значения смотрите в CIBlockProperty::GetList().
     * @return CDBResult
     */
    public static function GetProperties(int $ID, array $arOrder = [], array $arFilter = []): CDBResult
    {
        return new CDBResult();
    }

    /**
     * Возвращает права доступа к информационному блоку ID для всех групп пользователей.
     *
     * @param integer $ID Код информационного блока.
     * @return array Массив прав вида Array("ID группы"=>"Право доступа"[, ...]).
     */
    public static function GetGroupPermissions(int $ID): array
    {
        return [];
    }

    /**
     * Возвращает право доступа к информационному блоку IBLOCK_ID для пользователя с кодом FOR_USER_ID или для текущего пользователя (если код не задан).
     * Примечание: метод считается устаревшим (не работает при использовании расширенных прав). Рекомендуется использовать CIBlockElementRights::UserHasRightTo и CIBlockSectionRights::UserHasRightTo.
     *
     * @param integer $IBLOCK_ID Код информационного блока.
     * @param integer|boolean $FOR_USER_ID Код пользователя. Необязательный параметр.
     * @return string
     */
    public function GetPermission(int $IBLOCK_ID, $FOR_USER_ID = false): string
    {
        return '';
    }

    /**
     * Метод возвращает количество элементов информационного блока.
     * Примечание: активность элементов и права доступа не учитываются.
     *
     * @param integer $iblock_id Код информационного блока.
     * @return integer
     */
    public function GetElementCount(int $iblock_id): int
    {
        return 0;
    }

    /**
     * Метод выполняет масштабирование файла. Метод статический.
     * Примечание: обрабатываются только файлы JPEG, GIF и PNG (зависит от используемой библиотеки GD). Файл указанный в параметре arFile будет перезаписан.
     *
     * @param array $arFile Массив, описывающий файл. Это может быть элемент массива $_FILES[имя] (или $HTTP_POST_FILES[имя]), а также результат метода CFile::MakeFileArray.
     *  С версии модуля 14.0.0 массив файла передается в ключе VALUE, а описание - в ключе DESCRIPTION.
     * @param array $arResize Массив параметров масштабирования. Содержит следующие ключи:
     * WIDTH - целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
     * HEIGHT - целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля. 
     * METHOD - возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов.
     * COMPRESSION - целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
     *  Параметры METHOD и COMPRESSION применяются только если происходит изменение размера. Если картинка вписывается в ограничения WIDTH и HEIGHT, то никаких действий над файлом выполнено не будет.
     * @return array|string Массив описывающий файл или строка с сообщением об ошибке.
     */
    public static function ResizePicture(array $arFile, array $arResize)
    { }
}
