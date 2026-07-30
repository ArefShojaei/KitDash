<?php

namespace Kit\Net\Constants;

final class UrlRegexPattern
{
    public const HOST = "/https?:\/\/(?<host>[\w._]+)\/?/";

    public const ORIGIN = "/(?<origin>https?:\/\/[\w._]+)\/?/";

    public const PATH = "/https?:\/\/[\w._]+(?<path>\/.+)/";

    public const PROTOCOL = "/(?<protocol>https?).+/";

    public const QUERY = "/https?:\/\/.+\?(?<query>.+)/";
}
