""" Module used for code factorisation of end to end tests """

import socket
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from consts import File
from consts import Xpath

_WAIT = 10
_UNAME = "uname_test"
_PSWD = "pswd_test"
_DELETE_BTN = "delete-"


def chrome_webdriver():
    """ Initialisation of the webdriver """
    addr = socket.gethostbyname(socket.gethostname())
    chrome = webdriver.Remote(
        "http://" + addr + ":4444/wd/hub",
        DesiredCapabilities.CHROME)
    chrome.get('http://php-apache:80')
    wait_url(chrome, File.HOME_PAGE)
    return chrome


def fill_user_fields(browser, name=_UNAME):
    """ Fill the user registration or login """
    uname_field = browser.find_element_by_xpath(Xpath.UNAME_FIELD)
    uname_field.send_keys(name)
    pass_field = browser.find_element_by_xpath(Xpath.PASSWD_FIELD)
    pass_field.send_keys(_PSWD)
    browser.find_element_by_xpath(Xpath.SUBMIT_LOGIN_BTN).click()


def browser_register(browser, name=_UNAME):
    """ Registration of a user """
    browser.find_element_by_xpath(Xpath.REGISTER_BTN).click()
    wait_url(browser, File.REGISTER)
    fill_user_fields(browser, name)
    if File.HOME_PAGE not in browser.current_url:
        browser.find_element_by_xpath(Xpath.HOME_BTN).click()
        wait_url(browser, File.HOME_PAGE)


def browser_login(browser):
    """ Login of the webdriver """
    browser.find_element_by_xpath(Xpath.LOGIN_BTN).click()
    wait_url(browser, File.LOGIN)
    fill_user_fields(browser)


def browser_logout(browser):
    """ Logout the webdriver """
    browser.find_element_by_xpath(Xpath.LOGOUT_BTN).click()


def browser_create_project(browser, project_name):
    """ Makes the webdriver create a project """
    link = browser.find_element_by_xpath(Xpath.CREATE_PROJECT_BTN)
    link.click()
    wait_url(browser, File.CREATE_PROJECT)
    field = browser.find_element_by_xpath(Xpath.PROJECT_NAME_FIELD)
    field.send_keys(project_name)
    submit = browser.find_element_by_xpath(Xpath.SAVE_PROJECT_BTN)
    submit.click()
    wait_url(browser, File.PROJECT_LIST)


def browser_delete_project(browser, project_name):
    """ Makes the webdriver delete a project """
    delete_btn = "//a[@id='" + _DELETE_BTN + project_name + "']"
    delete_btn = browser.find_element_by_xpath(delete_btn)
    delete_btn.click()


def wait_url(browser, content):
    """ Makes the webdriver wait for the usr to change """
    wait = WebDriverWait(browser, _WAIT)
    wait.until(EC.url_contains(content))
