from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from consts import *

_WAIT = 10
_UNAME = "uname_test"
_PSWD = "pswd_test"
_DELETE_BTN = "delete-"
_US_ID = "uname_test"
_US_DESC = "us_description"
_US_PRIO_H = "High"
_US_DIFF_2 = "2"


def chromeWebdriver():
    chrome = webdriver.Remote(
        "http://127.0.0.1:4444/wd/hub",
        DesiredCapabilities.CHROME)
    return chrome


def browserRegister(browser):
    browser.find_element_by_xpath(Xpath.REGISTER_BTN).click()
    waitURL(browser, File.REGISTER)
    _fillUserFields(browser)
    if File.HOME_PAGE not in browser.current_url:
        browser.find_element_by_xpath(Xpath.HOME_BTN).click()
        waitURL(browser, File.HOME_PAGE)


def browserLogin(browser):
    browser.find_element_by_xpath(Xpath.LOGIN_BTN).click()
    waitURL(browser, File.LOGIN)
    _fillUserFields(browser)


def browserLogout(browser):
    browser.find_element_by_xpath(Xpath.LOGOUT_BTN).click()


def _fillUserFields(browser):
    unameField = browser.find_element_by_xpath(Xpath.UNAME_FIELD)
    unameField.send_keys(_UNAME)
    passField = browser.find_element_by_xpath(Xpath.PASSWD_FIELD)
    passField.send_keys(_PSWD)
    browser.find_element_by_xpath(Xpath.SUBMIT_LOGIN_BTN).click()

def _fillUserStoryFields(browser):
    usid = browser.find_element_by_xpath(Xpath.US_ID_FIELD)
    usid.send_keys(_US_ID)
    usdesc = browser.find_element_by_xpath(Xpath.US_DESC_FIELD)
    usdesc.send_keys(_US_DESC)
    usprio = browser.find_element_by_xpath(Xpath.US_PRIO_FIELD)
    usprio.send_keys(_US_PRIO_H)
    usdiff = browser.find_element_by_xpath(Xpath.US_DIFF_FIELD)
    usdiff.send_keys(_US_DIFF_2)
    browser.find_element_by_xpath(Xpath.VALID_ADDUS_BTN).click()

def browserCreateProject(browser, projectName):
    link = browser.find_element_by_xpath(Xpath.CREATE_PROJECT_BTN)
    link.click()
    waitURL(browser, File.CREATE_PROJECT)
    field = browser.find_element_by_xpath(Xpath.PROJECT_NAME_FIELD)
    field.send_keys(projectName)
    submit = browser.find_element_by_xpath(Xpath.SAVE_PROJECT_BTN)
    submit.click()
    waitURL(browser, File.PROJECT_LIST)

def browserDeleteProject(browser, projectName):
    deleteBtn = "//a[@id='" + _DELETE_BTN + projectName + "']"
    deleteBtn = browser.find_element_by_xpath(deleteBtn)
    deleteBtn.click()

def waitURL(browser, content):
    wait = WebDriverWait(browser, _WAIT)
    wait.until(EC.url_contains(content))
