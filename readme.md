# Monica Fork

**随意添加您需要的功能，我们没有 CI，没有 style-lint，也没有付费用户需要顾忌**

本分叉与上游的区别：
1. 支持农历(阴历)日期的提醒（很重要，许多人过农历生日、纪念日）
2. 对 storage 的访问增加了权限验证（排除了穷举照片、文档的风险）

## 首页截图

![首页截图](docs/home.jpg)

## 联系人截图

![联系人截图](docs/people.jpg)

**\#** Do you want to add more calendars (Buddhist, Islamic, Japanese)?
1. Add a translation in `resource/lang/en/people.php`, search for `reminders_calendar_lunar`. For example: add `reminders_calendar_buddhist` after `reminders_calendar_lunar`.
2. Realize the corresponding Gregorian date conversion operation in `convertToSolarCalendarDate` and `addTimeAccordingToFrequencyType` in `app/Helpers/DateHelper.php`.

此项目从 2020 年 12 月 fork 自 [Monica](https://github.com/monicahq/monica)
